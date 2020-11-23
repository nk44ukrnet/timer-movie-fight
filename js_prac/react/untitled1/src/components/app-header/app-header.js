import React from 'react';
import './app-header.css';

import styled from 'styled-components';

const Header = styled.div`
  display: flex;  
  align-items: flex-end;
  justify-content: space-between;
  
  h1 {
  font-size:26px;
  color: ${props => props.colored ? 'black' : 'pink'}
  }
  h2 {
  font-size: 1.2rem;
  color: gray
  }
`;

const AppHeader = () => {
    return (
        <Header colored as='a'>
        <h1>Name Surname</h1>
        <h2>5 records, liked: 0</h2>
        </Header>
    )
}

export default AppHeader;