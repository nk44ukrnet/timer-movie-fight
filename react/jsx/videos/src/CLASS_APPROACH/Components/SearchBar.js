import React from 'react';

class SearchBar extends React.Component {
    state = {term: ''}

    onInputChange = (e) => {
        this.setState({term: e.target.value});
    }

    onFormSubmit = (e) => {
        e.preventDefault();

        //TODO: Make sure we call callback from parent component
        this.props.onFormSubmit(this.state.term);
    }

    render() {
        return (
          <div className="ui segment search-bar">
              <form className="ui form" onSubmit={this.onFormSubmit}>
                  <div className="field">
                      <label htmlFor="videoSearch">Video Search</label>
                      <input
                          type="text"
                          value={this.state.term}
                          id="videoSearch"
                          onChange={this.onInputChange}
                      />
                  </div>
              </form>
          </div>
        );
    }
}

export default SearchBar;