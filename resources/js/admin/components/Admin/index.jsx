import React from 'react'
import AdminBar from '@components/Admin/AdminBar';
import { BrowserRouter as Router, Route } from "react-router-dom";

const Index = () => <h2>Home</h2>;
const About = () => <h2>About</h2>;
const Users = () => <h2>Users</h2>;

const AdminDashboard = () => (
    <Router>
      <AdminBar>
        <Route path="/admin-panel/" exact component={Index} />
        <Route path="/admin-panel/articles/" component={About} />
        <Route path="/admin-panel/categories/" component={Users} />
      </AdminBar>
    </Router>
);

export default AdminDashboard