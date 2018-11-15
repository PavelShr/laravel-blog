import React, { PureComponent } from 'react'
import { withStyles } from '@material-ui/core/styles'
import Drawer from '@components/Admin/Drawer'

class AdminDashboard extends PureComponent {
  state = {
    drawerIsOpen: true,
  }

  toggleDrawer = () => {
    this.setState({
      drawerIsOpen: !this.state.drawerIsOpen,
    })
  }

  render () {
    return (
      <div>
        <button onClick={this.toggleDrawer}>dsfasdfa</button>
        <Drawer isOpen={this.state.drawerIsOpen}/>
      </div>
    )
  }

}

export default AdminDashboard