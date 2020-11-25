import React from 'react';

export default class SearchPanel extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            term: ''
        }
        this.onUpdateSearch = this.onUpdateSearch.bind(this);
    }
    onUpdateSearch(e){
        const term = e.target.value;
        this.setState({term}) // Means: term:term
        this.props.onUpdateSearch(term);
    }
    render() {
        return (
            <input
                className="form-control search-input"
                type="text"
                placeholder="Search by records"
                onChange={this.onUpdateSearch}
            />
        )
    }
}

