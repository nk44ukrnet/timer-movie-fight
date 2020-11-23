import React from 'react';
import './post-add-form.css';

const PostAddForm = ({onAdd}) => {
    return (
        <div className="bottom-panel d-flex">
            <input
                type="text"
                placeholder="Type something"
                className="form-control new-post-label"
            />
            <button
                className="btn btn-secondary"
                type="submit"
            onClick={()=> onAdd('Hello')}
            >
                Add post
            </button>
        </div>
    )
}

export default PostAddForm;