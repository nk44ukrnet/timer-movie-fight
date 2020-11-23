import React from 'react';
import './post-add-form.css';

const PostAddForm = () => {
    return (
        <form className="bottom-panel d-flex">
            <input
                type="text"
                placeholder="Type something"
                className="form-control new-post-label"
            />
            <button
                className="btn btn-secondary"
                type="submit">
                Add post
            </button>
        </form>
    )
}

export default PostAddForm;