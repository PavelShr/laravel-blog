import React from 'react';

const FormError = ({message, showIf}) => (
    showIf ?
        <span className='form-error'>{message}</span>
        :
        <span className='form-error'/>
);

export default FormError;