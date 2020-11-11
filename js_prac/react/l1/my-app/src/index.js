import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
// import App from './App';
// import reportWebVitals from './reportWebVitals';


const Header = () => {
    const src = 'Testing'
    return <h1>{src}</h1>
}
const Field = () => {
    const holder = 'Enter here';
    const styledField = {
        width: '300px',
        color: 'brown'
    }
    return <input type="text" placeholder={holder} autoComplete="" className="first" htmlFor="" style={styledField}/>
}
const Btn = () => {
    const text = "Log in";
    const logged = true;
    const res = () => {
        return 'Log in, please';
    }
    const p = <p>Log in !!</p>
    return <button>{logged ? 'Enter' : text}</button>
}

const App = () => {
    return (
        <div>
            <Header/>
            <Field/>
            <Btn/>
        </div>
    )
}

ReactDOM.render(<App/>, document.getElementById('root'));


