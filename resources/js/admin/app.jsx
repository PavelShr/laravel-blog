import React, {PureComponent} from 'react';
import CssBaseline from '@material-ui/core/CssBaseline';
import AdminDashboard from '@components/Admin';
import {createMuiTheme} from '@material-ui/core/styles';
import MuiThemeProvider from '@material-ui/core/styles/MuiThemeProvider';

class App extends PureComponent {

  theme = createMuiTheme({
    typography: {
      useNextVariants: true,
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
          <AdminDashboard/>
        </MuiThemeProvider>
    );
  }

}

export default App;