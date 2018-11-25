import React from 'react'
import Grid from '@material-ui/core/Grid'
import classNames from 'classnames'
import '@authStyles/auth.css'

const Page = ({children}) => (
    <Grid container>
      <Grid item md={4}/>
      <Grid  item md={4}>
        <Grid container alignContent='center' alignItems={'center'} className={classNames('auth-block--wrapper')}>
            {children}
        </Grid>
      </Grid>
      <Grid item md={4}/>
    </Grid>
);

export default Page
