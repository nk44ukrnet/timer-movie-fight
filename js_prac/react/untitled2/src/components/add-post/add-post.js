import React from 'react';

export default class AddPost extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            text: ''
        }
        this.submitForm = this.submitForm.bind(this);
        this.inputTyping = this.inputTyping.bind(this);
    }
    submitForm(e){
        e.preventDefault();
        const id1 = document.querySelector('#isImportant'),
            id2 = document.querySelector('#isLiked');

        let id1send = (id1.checked) ? true : false;
        let id2send = (id2.checked) ? true : false;
        if(this.state.text.trim()) {
            this.props.onAdd({
                text: this.state.text,
                important: id1send,
                like: id2send
            })
            this.setState({
                text: ''
            })
            id1.checked = false;
            id2.checked = false;
        }
    }
    inputTyping(e){
        this.setState({
            text: e.target.value
        })
    }
    render() {
        return (
            <form onSubmit={this.submitForm}>
                <input type="text" value={this.state.text} onChange={this.inputTyping}/>
                <label htmlFor="isImportant"> Important
                    <input type="checkbox" id="isImportant"/>
                </label>
                <label htmlFor="isLiked"> Like
                    <input type="checkbox" id="isLiked"/>
                </label>
                <button type="submit">ADD to list</button>
            </form>
        )
    }
}

