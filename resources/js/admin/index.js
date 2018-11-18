import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux';
import { Provider } from 'react-redux';
import todoApp from '@reducers/commonReducer';
import App from './app';
// import '@styles/app.css';

export const store = createStore(todoApp);

ReactDOM.render(
    <Provider store={store}>
        <App />
    </Provider>,
document.getElementById('admin')
);
