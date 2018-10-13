import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux';
import { Provider } from 'react-redux';
import todoApp from './store/reducers/commonReducer';
import App from './app'
import CssBaseline from '@material-ui/core/CssBaseline'


export const store = createStore(todoApp)

ReactDOM.render(
    <Provider store={store}>
        <CssBaseline />
        <App />
    </Provider>,
document.getElementById('root')
);
