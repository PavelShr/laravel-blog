import React, {PureComponent} from 'react';
import Grid from '@material-ui/core/Grid/Grid';
import Typography from '@material-ui/core/Typography/Typography';
import TextField from '@material-ui/core/TextField/TextField';
import Button from '@material-ui/core/Button/Button';
import classNames from 'classnames';
import {Link} from 'react-router-dom';
import FormError from '@commonComponents/FormError';
import axios from 'axios';
import { JWT_KEY } from '@commonComponents/constants';

import Validator from '@helpers/Validator';

export default class SignIn extends PureComponent {
  LOGIN_URL = '/api/auth/login';

  constructor(props) {
    super(props);

    this.state = {
      email: '',
      password: '',
      emailIsValid: null,
      authFailed: false,
      errors: {email: '', password: ''},
      errorMessage: '',
    }
  }

  handleEmailChange = ({target}) => {
    this.setState({email: target.value});
  }

  handlePasswordChange = ({target}) => {
    this.setState({password: target.value});
  }

  handleSubmit = (event) => {
    event.preventDefault();
    if (!Validator.emailIsValid(this.state.email)) {
      this.setState({emailIsValid: false, errors: {email: 'Not valid email.'}});
    } else {
      this.setState({emailIsValid: true});
      axios.post(this.LOGIN_URL,
          {email: this.state.email, password: this.state.password}).
          then((response) => {
            this.setState({authFailed: false});
            localStorage.setItem(JWT_KEY, `${response.data.token_type} ${response.data.access_token}`);
            window.location = '/admin-panel';
          }).
          catch((error) => {
            let errorResponse = error.response;
            this.setState({authFailed: true, errorMessage: errorResponse.data.message});
          });
    }
  }

  render() {
    return (
        <Grid container>
          <Grid item md={12}>
            <Typography variant="h5" component="h3">
              Sign In
            </Typography>
          </Grid>
          <form method='POST' id='login-form' className={'full-width'}
                onSubmit={this.handleSubmit}>
            <Grid item md={12}>
              {this.state.emailIsValid === false ? (
                  <TextField
                      error
                      id="email"
                      className={'full-width'}
                      label={this.state.errors.email}
                      value={this.state.email}
                      margin="normal"
                      onChange={this.handleEmailChange}
                  />
              ) : (
                  <TextField
                      id="email"
                      className={'full-width'}
                      label="Email"
                      value={this.state.email}
                      margin="normal"
                      onChange={this.handleEmailChange}
                  />
              )}
            </Grid>
            <Grid item md={12}>
              <TextField
                  id="pass"
                  className={'full-width'}
                  label="Password"
                  value={this.state.password}
                  margin="normal"
                  type='password'
                  onChange={this.handlePasswordChange}
              />
            </Grid>
            <FormError showIf={this.state.authFailed} message={this.state.errorMessage}/>
            <Grid item md={12}>
              <Button variant="contained" color="secondary"
                      className={classNames('full-width', 'submit-button')}
                      type='submit'>
                Log In
              </Button>
            </Grid>
          </form>
          <Grid className='delimiter' item sm={12}>
            <span>OR</span>
          </Grid>
          <Grid className='toggle-form' item sm={12}>
            <Link to="/auth/sign-up/">sign up</Link>
          </Grid>
        </Grid>
    );
  }
}