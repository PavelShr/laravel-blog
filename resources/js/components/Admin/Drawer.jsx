import React, { PureComponent } from 'react';
import { withStyles } from '@material-ui/core/styles';
import SwipeableDrawer from '@material-ui/core/SwipeableDrawer';
import List from '@material-ui/core/List';

class Drawer extends PureComponent {

  render() {
    return (
      <SwipeableDrawer
        open={this.props.isOpen}
        // onClose={this.toggleDrawer()}
        // onOpen={this.toggleDrawer()}
      >
        fsdfasdf
      </SwipeableDrawer>
    )
  }

}

export default Drawer