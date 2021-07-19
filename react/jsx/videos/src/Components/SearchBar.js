import React, {useState} from 'react';

const SearchBar = ({onFormSubmit}) => {
    const [term, setTerm] = useState('');

   const onSubmit = (e) => {
        e.preventDefault();

        //TODO: Make sure we call callback from parent component
        onFormSubmit(term);
    }

    return (
        <div className="ui segment search-bar">
            <form className="ui form" onSubmit={onSubmit}>
                <div className="field">
                    <label htmlFor="videoSearch">Video Search!!!!!!!!!</label>
                    <input
                        type="text"
                        value={term}
                        id="videoSearch"
                        onChange={(e)=>setTerm(e.target.value)}
                    />
                </div>
            </form>
        </div>
    );
}


export default SearchBar;