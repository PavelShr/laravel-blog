import React from 'react';
import { BrowserRouter as Router, Route } from "react-router-dom";
import Page from '@authComponents/Page';
import Paper from '@material-ui/core/Paper';
import SignIn from '@authComponents/SignIn';
import SignUp from '@authComponents/SignUp';
import classNames from 'classnames';

const AuthForm = () => (
    <Router>
      <Page>
        <Paper className={classNames('auth-block')} elevation={1}>
          <div>
            <Route path="/auth/sign-in/" exact component={SignIn} />
            <Route path="/auth/sign-up/" component={SignUp} />
          </div>
        </Paper>
      </Page>
    </Router>
);

export default AuthForm
