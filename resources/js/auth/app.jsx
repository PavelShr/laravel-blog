import React, {PureComponent} from 'react';
import CssBaseline from '@material-ui/core/CssBaseline';
import AuthForm from '@authComponents/AuthForm';
import Page from '@authComponents/Page';
import {createMuiTheme} from '@material-ui/core/styles';
import MuiThemeProvider from '@material-ui/core/styles/MuiThemeProvider';

class App extends PureComponent {

  theme = createMuiTheme({
    typography: {
      useNextVariants: true,
      fontFamily: [
        '"Montserrat-Medium"',
        '-apple-system',
        'BlinkMacSystemFont',
        'Roboto',
        '"Helvetica Neue"',
        'Arial',
        'sans-serif',
      ].join(','),
      fontSize: 14,
    },
    palette: {
      primary: {
        main: '#ffffff',
      },
      secondary: {
        main: '#3f946e',
      },
    },
  });

  render() {

    return (
        <MuiThemeProvider theme={this.theme}>
          <CssBaseline/>
          <AuthForm/>
        </MuiThemeProvider>
    );
  }

}

export default App;