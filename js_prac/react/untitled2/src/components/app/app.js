import React from 'react';
import Header from "../header/header";
import ListCounter from "../list-counter/list-counter";
import ListBody from "../list-body/list-body";
import AddPost from "../add-post/add-post";

export default class App extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            data: [
                {text: 'Перший запис', important: false, like: false, id: 1},
                {text: 'Другий запис', important: false, like: false, id: 2},
                {text: 'Третій запис', important: false, like: false, id: 3}
            ],
        }
        this.startId = this.state.data.length + 1;
        this.addPost = this.addPost.bind(this);
    }
    addPost(body){
        const newItem = {
            ...body,
            id: this.startId++
        }
        this.setState(({data}) =>{
            const oldItem = this.state.data;
            const newItemAdd = [...oldItem, newItem];
            return {
                data: newItemAdd
            }
        });
    }
    render() {
        const {data} = this.state;
        return (
            <>
                <Header/>
                <ListCounter
                    numOfRecords={data.length}
                />
                <ListBody
                    allRecords={this.state.data}
                />
                <AddPost onAdd={this.addPost}/>
            </>
        )
    }
}