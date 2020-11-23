import React from 'react';
import {Button} from 'reactstrap';
import './post-status-filter.css';


const PostStatusFilter = () => {
    return (
        <div className="btn-group">
            <Button outline color="info"> ALL!</Button>
            <button className="btn btn-info" type="button">All</button>
            <button className="btn btn-outline-secondary" type="button">Liked</button>
        </div>
    )
}

export default PostStatusFilter;