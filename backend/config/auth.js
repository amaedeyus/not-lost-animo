const express = require('express');
const passport = require('passport');
const GoogleStrategy = require('passport-google-oauth20').Strategy;
const pool = require('./dbconnect'); // Database connection
const session = require('express-session');
const bcrypt = require('bcryptjs');
const flash = require('connect-flash');

// Load environment variables
require('dotenv').config({ path: './backend/config/.env' });

// Define allowed test emails
const allowedTestEmails = ['amybalion533@gmail.com', 'balionamaya01@gmail.com'];

// Normalize emails once for comparison
const normalizedAllowedEmails = allowedTestEmails.map(email => email.toLowerCase());

// Initialize Express app
const app = express();

// Middleware
app.use(session({
  secret: process.env.SESSION_SECRET || 'your-secret-key',
  resave: false,
  saveUninitialized: true,
  cookie: { secure: false } // Set to true if using HTTPS
}));
app.use(flash());
app.use(passport.initialize());
app.use(passport.session());

// Passport configuration
passport.use(new GoogleStrategy({
    clientID: process.env.GOOGLE_CLIENT_ID,
    clientSecret: process.env.GOOGLE_CLIENT_SECRET,
    callbackURL: '/auth/google/callback'
  },
  async (accessToken, refreshToken, profile, done) => {
    try {
      const email = profile.emails[0]?.value.toLowerCase(); // Normalize email

      // Log what we're processing
      console.log('Google Profile:', { name: profile.displayName, email });

      // Check if email is authorized
      if (!email.endsWith('@dlsl.edu.ph') && !normalizedAllowedEmails.includes(email)) {
        console.log(`Unauthorized email: ${email}`);
        return done(null, false, { message: 'Unauthorized email domain.' });
      }

      // Extract first name and generate hashed password
      const firstName = profile.displayName.trim().split(/\s+/)[0].toLowerCase();
      const hashedPassword = await bcrypt.hash(firstName, 10); // Salt rounds = 10

      // Check if user exists in the database
      const connection = await pool.getConnection();
      const [rows] = await connection.execute(
        'SELECT user_index, email, type FROM users WHERE LOWER(email) = ?',
        [email]
      );

      if (rows.length === 0) {
        console.log(`User not found in DB: ${email}. Creating new user...`);

        // Insert new user into the database with 'student' role and hashed password
        const [insertResult] = await connection.execute(
          'INSERT INTO users (email, type, password, created_at) VALUES (?, ?, ?, NOW())',
          [email, 'student', hashedPassword]
        );

        if (insertResult.affectedRows === 0) {
          console.error(`Failed to create user: ${email}`);
          return done(null, false, { message: 'Failed to create user.' });
        }

        // Fetch the newly created user
        const [newUser] = await connection.execute(
          'SELECT user_index, email, type FROM users WHERE LOWER(email) = ?',
          [email]
        );
        connection.release();

        if (newUser.length === 0) {
          console.error(`Failed to fetch newly created user: ${email}`);
          return done(null, false, { message: 'Failed to fetch user after creation.' });
        }

        return done(null, {
          user_index: newUser[0].user_index,
          email: newUser[0].email,
          userType: newUser[0].type,
          name: profile.displayName
        });
      }

      // User exists in the database
      const user = rows[0];
      connection.release();

      return done(null, {
        user_index: user.user_index,
        email: user.email,
        userType: user.type,
        name: profile.displayName
      });

    } catch (err) {
      console.error('Error during Google auth:', err.message);
      return done(err);
    }
  }
));

// Serialize and deserialize user
passport.serializeUser((user, done) => {
  done(null, user.user_index);
});

passport.deserializeUser(async (user_index, done) => {
  try {
    const connection = await pool.getConnection();
    const [rows] = await connection.execute(
      'SELECT user_index, email, type FROM users WHERE user_index = ?',
      [user_index]
    );
    connection.release();

    if (rows.length === 0) return done(new Error('User not found'));

    done(null, rows[0]);

  } catch (err) {
    done(err);
  }
});

// Routes
app.get('/auth/google',
  passport.authenticate('google', { scope: ['profile', 'email'] })
);

app.get('/auth/google/callback',
  passport.authenticate('google', { 
    failureRedirect: 'http://localhost/not-lost-animo/public/system-login/front-end.html?error=google_failed',
    failureFlash: true // Enable flash messages
  }),
  (req, res) => {
    // Successful authentication
    if (req.isAuthenticated() && req.user.userType === 'staff') {
      res.redirect('http://localhost/not-lost-animo/public/user-staff/staff-item-main.php');
    } else {
      res.redirect('http://localhost/not-lost-animo/public/user-student/item-main.php');
    }
  }
);

// Start server
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Auth server listening on port ${PORT}`);
});