import React, { PureComponent } from 'react';
import CssBaseline from '@material-ui/core/CssBaseline'
import Example from '@components/Example'
class App extends PureComponent {

    render() {
        return (
            <div>
                <CssBaseline/>
                <Example/>
            </div>
        )
    }

}

export default App