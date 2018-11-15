import React, { PureComponent } from 'react';
import CssBaseline from '@material-ui/core/CssBaseline'
import AdminDashboard from '@components/Admin'
class App extends PureComponent {

    render() {
        return (
            <div>
                <CssBaseline/>
                <AdminDashboard/>
            </div>
        )
    }

}

export default App