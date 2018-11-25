import React, {PureComponent} from 'react';
import Grid from '@material-ui/core/Grid/Grid';
import Typography from '@material-ui/core/Typography/Typography';
import TextField from '@material-ui/core/TextField/TextField';
import Button from '@material-ui/core/Button/Button';
import classNames from 'classnames';
import {Link} from 'react-router-dom';

export default class SignUp extends PureComponent {
  constructor(props) {
    super(props);

    this.state = {
      email: '',
      password: '',
      passwordConfirm: '',
    }
  }

  handleEmailChange = ({target}) => {
    this.setState({email: target.value});
  }

  handlePasswordChange = ({target}) => {
    this.setState({password: target.value});
  }

  handlePasswordChange = ({target}) => {
    this.setState({passwordConfirm: target.value});
  }

  render() {
    return (
        <Grid container>
          <Grid item md={12}>
            <Typography variant="h5" component="h3">
              Sign Up
            </Typography>
          </Grid>
          <form method='POST' id='signup-form' className={'full-width'}>
            <Grid item md={12}>
              <TextField
                  id="email"
                  className={'full-width'}
                  label="Email"
                  margin="normal"
                  onChange={this.handleEmailChange}
              />
            </Grid>
            <Grid item md={12}>
              <TextField
                  id="pass"
                  className={'full-width'}
                  label="Password"
                  margin="normal"
                  type='password'
                  onChange={this.handlePasswordChange}
              />
            </Grid>
            <Grid item md={12}>
              <TextField
                  id="pass-confirm"
                  className={'full-width'}
                  label="Confirm password"
                  margin="normal"
                  type='password'
                  onChange={this.handlePasswordConfirmChange}
              />
            </Grid>
            <Grid item md={12}>
              <Button variant="contained" color="secondary" className={classNames('full-width', 'submit-button')} type='submit'>
                Sign Up
              </Button>
            </Grid>
          </form>
          <Grid className='delimiter' item sm={12}>
            <span>OR</span>
          </Grid>
          <Grid className='toggle-form' item sm={12}>
            <Link to="/auth/sign-in/">sign in</Link>
          </Grid>
        </Grid>
    );
  }
}