const express = require('express');
const passport = require('passport');
const GoogleStrategy = require('passport-google-oauth20').Strategy;
const pool = require('./dbconnect');
const session = require('express-session');
const bcrypt = require('bcryptjs');
const flash = require('connect-flash');
const dotenv = require('dotenv');
const cors = require('cors');

dotenv.config({ path: './backend/config/.env' });

const allowedTestEmails = ['amybalion533@gmail.com', 'balionamaya01@gmail.com'];
const normalizedAllowedEmails = allowedTestEmails.map(email => email.toLowerCase());

const app = express();
app.use(cors());
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.use(session({
  secret: process.env.SESSION_SECRET || 'default-secret',
  resave: false,
  saveUninitialized: false,
  cookie: {
    secure: false,
    httpOnly: true
  }
}));

app.use(flash());
app.use(passport.initialize());
app.use(passport.session());

passport.use(new GoogleStrategy({
    clientID: process.env.GOOGLE_CLIENT_ID,
    clientSecret: process.env.GOOGLE_CLIENT_SECRET,
    callbackURL: '/auth/google/callback'
  },
  async (accessToken, refreshToken, profile, done) => {
    const email = profile.emails[0].value.toLowerCase();

    if (!email.endsWith('@dlsl.edu.ph') && !normalizedAllowedEmails.includes(email)) {
      return done(null, false, { message: 'Unauthorized email domain.' });
    }

    try {
      const connection = await pool.getConnection();
      const [existing] = await connection.execute(
        'SELECT user_index, email, type FROM users WHERE LOWER(email) = ?',
        [email]
      );

      if (existing.length > 0) {
        const user = existing[0];
        connection.release();
        return done(null, {
          user_index: user.user_index,
          email: user.email,
          userType: user.type,
          name: profile.displayName
        });
      } else {
        const firstName = profile.displayName.split(' ')[0].toLowerCase();
        const hashedPassword = await bcrypt.hash(firstName, 10);

        const [insertResult] = await connection.execute(
          'INSERT INTO users (email, type, password, created_at) VALUES (?, ?, ?, NOW())',
          [email, 'student', hashedPassword]
        );

        if (insertResult.affectedRows === 0) {
          connection.release();
          return done(null, false, { message: 'Failed to create user.' });
        }

        const [newUser] = await connection.execute(
          'SELECT user_index, email, type FROM users WHERE LOWER(email) = ?',
          [email]
        );
        connection.release();

        return done(null, {
          user_index: newUser[0].user_index,
          email: newUser[0].email,
          userType: newUser[0].type,
          name: profile.displayName
        });
      }

    } catch (error) {
      console.error('Google Auth Error:', error);
      return done(error);
    }
  }
));

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
  } catch (error) {
    done(error);
  }
});

// Routes
app.get('/auth/google',
  passport.authenticate('google', { scope: ['profile', 'email'] })
);

app.get('/auth/google/callback',
  passport.authenticate('google', {
    failureRedirect: 'http://localhost/not-lost-animo/public/system-login/front-end.html?error=google_failed',
    failureFlash: true
  }),
  (req, res) => {
    if (req.user) {
      const { user_index, email, userType } = req.user;
      const redirectBase = userType === 'staff'
        ? 'http://localhost/not-lost-animo/public/user-staff/staff-item-main.php'
        : 'http://localhost/not-lost-animo/public/user-student/item-main.php';

      const redirectURL = `${redirectBase}?uid=${user_index}`;
      return res.redirect(redirectURL);
    }

    res.redirect('http://localhost/not-lost-animo/public/system-login/front-end.html?error=missing_user');
  }
);

app.get('/logout', (req, res) => {
  req.logout(() => {
    req.session.destroy();
    res.redirect('http://localhost/not-lost-animo/public/system-login/front-end.html');
  });
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Auth server running on port ${PORT}`);
});
