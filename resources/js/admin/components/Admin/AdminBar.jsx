import React, {PureComponent} from 'react';
// components
import AppBar from '@material-ui/core/AppBar';
import Toolbar from '@material-ui/core/Toolbar/Toolbar';
import Typography from '@material-ui/core/Typography/Typography';
import Divider from '@material-ui/core/Divider/Divider';
import List from '@material-ui/core/List/List';
import ListItem from '@material-ui/core/ListItem/ListItem';
import ListItemIcon from '@material-ui/core/ListItemIcon/ListItemIcon';
import ListItemText from '@material-ui/core/ListItemText/ListItemText';
import Drawer from '@material-ui/core/Drawer/Drawer';
import { BrowserRouter as Router, Link } from "react-router-dom";
// styles
import classNames from 'classnames';
import withStyles from '@material-ui/core/es/styles/withStyles';
import styles from '@assets/styles/components/adminBarStyles.js';
// icons
import MenuIcon from '@material-ui/icons/MenuOutlined';
import ChevronLeftIcon from '@material-ui/icons/ChevronLeftOutlined';
import IconButton from '@material-ui/core/IconButton/IconButton';
import ArticleIcon from '@material-ui/icons/ArtTrackOutlined';
import CategoriesIcon from '@material-ui/icons/CategoryOutlined';
import SettingsIcon from '@material-ui/icons/SettingsOutlined';

class AdminBar extends PureComponent {
  state = {
    drawerIsOpen: true,
  };

  handleDrawerOpen = () => {
    this.setState({
      drawerIsOpen: true,
    });
  };

  handleDrawerClose = () => {
    this.setState({
      drawerIsOpen: false,
    });
  };

  render() {

    const {classes, theme} = this.props;

    return (
        <Router>
          <div className={classes.root}>
            <AppBar
                position="fixed"
                className={classNames(classes.appBar, {
                  [classes.appBarShift]: this.state.drawerIsOpen,
                })}
            >
              <Toolbar disableGutters={!this.state.drawerIsOpen}>
                <IconButton
                    color="inherit"
                    aria-label="Open drawer"
                    onClick={this.handleDrawerOpen}
                    className={classNames(classes.menuButton, {
                      [classes.hide]: this.state.drawerIsOpen,
                    })}
                >
                  <MenuIcon />
                </IconButton>
                <Typography variant="h6" color="inherit" noWrap>
                  Blog
                </Typography>
              </Toolbar>
            </AppBar>
            <Drawer
                variant="permanent"
                className={classNames(classes.drawer, {
                  [classes.drawerOpen]: this.state.drawerIsOpen,
                  [classes.drawerClose]: !this.state.drawerIsOpen,
                })}
                classes={{
                  paper: classNames({
                    [classes.drawerOpen]: this.state.drawerIsOpen,
                    [classes.drawerClose]: !this.state.drawerIsOpen,
                  }),
                }}
                open={this.state.drawerIsOpen}
            >
              <div className={classes.toolbar}>
                <IconButton onClick={this.handleDrawerClose}>
                  {theme.direction === 'rtl' ? <ChevronRightIcon /> : <ChevronLeftIcon />}
                </IconButton>
              </div>
              <Divider />
              <List>
                <Link className={classes.link} to='/admin-panel/articles/'>
                  <ListItem button>
                    <ListItemIcon><ArticleIcon color="secondary" /></ListItemIcon>
                    <ListItemText primary='Articles' />
                  </ListItem>
                </Link>
                <Link className={classes.link} to="/admin-panel/categories/">
                  <ListItem button>
                    <ListItemIcon><CategoriesIcon color="secondary"  /></ListItemIcon>
                    <ListItemText primary='Categories' />
                  </ListItem>
                </Link>
              </List>
              <Divider />
              <List>
                <ListItem button>
                  <ListItemIcon><SettingsIcon color="secondary" /></ListItemIcon>
                  <ListItemText primary={'Settings'} />
                </ListItem>
              </List>
            </Drawer>
            <main className={classes.content}>
              <div className={classes.toolbar} />
              { this.props.children }
            </main>
          </div>
        </Router>
    )
  }
}

export default withStyles(styles, {withTheme: true})(AdminBar);