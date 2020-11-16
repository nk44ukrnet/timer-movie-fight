import React from 'react';
import './search-panel.css';

const SearchPanel = () => {
    return (
        <input
            type="text"
            className="form-control search-input"
            placeholder="Search by records"
        />
    )
}

export default SearchPanel;