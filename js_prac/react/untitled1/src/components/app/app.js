import React from 'react';
import AppHeader from "../app-header/app-header";
import SearchPanel from "../search-panel/search-panel";
import PostStatusFilter from "../post-status-filter/post-status-filter";
import PostList from "../post-list/post-list";
import PostAddForm from "../post-add-form/post-add-form";

import './app.css';

const App = () => {

    const data = [
        {label: 'Test message1', important: true, id:'asdq'},
        {label: 'Test message2', important: false, id:'asdw'},
        {label: 'Test message3', important: false, id:'asdz'}
    ];

    return (
        <div className="app">
            <AppHeader/>
            <div className="search-panel d-flex">
                <SearchPanel/>
                <PostStatusFilter/>
            </div>
            <PostList posts={data}/>
            <PostAddForm/>
        </div>
    )
}

export default App;