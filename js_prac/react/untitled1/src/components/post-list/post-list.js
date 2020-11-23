import React from 'react';
import PostListItem from '../post-list-item/post-list-item';
import {ListGroup} from  'reactstrap';
import './post-list.css';


const PostList = ({posts, onDelete}) => {
    const elements = posts.map(item=>{
        const {id, ...itemProps} = item;
       return (
           <li className="list-group-item" key={id}>
               <PostListItem
                 /*  label={item.label}
                   important={item.important}*/
                   {...itemProps}
                   onDelete={()=> onDelete(id)}
               />
           </li>
       )
    });
    return (
        <ListGroup className="app-list">
            {elements}
        </ListGroup>
    )
}

export default PostList;

