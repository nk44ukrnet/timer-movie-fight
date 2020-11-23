import React from 'react';
import AppHeader from "../app-header/app-header";
import SearchPanel from "../search-panel/search-panel";
import PostStatusFilter from "../post-status-filter/post-status-filter";
import PostList from "../post-list/post-list";
import PostAddForm from "../post-add-form/post-add-form";

import './app.css';
import styled from 'styled-components';

const AppBlock = styled.div`
margin: 0 auto;
max-width: 800px;
background-color: none;
`;

const StyledAppBlock = styled(AppBlock)`
background-color: none;
`

export default class App extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            data: [
                {label: 'Test message1', important: true, id: 1},
                {label: 'Test message2', important: false, id: 2},
                {label: 'Test message3', important: false, id: 3}
            ]
        };
        this.deleteItem = this.deleteItem.bind(this);
        this.addItem = this.addItem.bind(this);

        this.maxId = 4;
    }
    deleteItem(id){
        this.setState(({data}) => {
            const idx = data.findIndex(elem => elem.id === id);
            // const before = data.slice(0, idx);
            // const after = data.slice(idx+1);

            // const newArr = [...before, ...after];
            const newArr = [...data.slice(0, idx), ...data.slice(idx+1)];
            return {
                data: newArr
            }
        });
    }
    addItem(body){
        // console.log(body);
        const newItem = {
            label: body,
            important: false,
            id: this.maxId++
        }
        this.setState(({data}) => {
            const newArr = [...data, newItem];
            return {
                data: newArr
            }
        })
    }
    render() {
        return (
            <StyledAppBlock>
                <AppHeader/>
                <div className="search-panel d-flex">
                    <SearchPanel/>
                    <PostStatusFilter/>
                </div>
                <PostList posts={this.state.data} onDelete={this.deleteItem}/>
                <PostAddForm onAdd={this.addItem}/>
            </StyledAppBlock>
        )
    }
}

// export default App;