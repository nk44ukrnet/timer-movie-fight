import React from 'react';
import './list-body-item.css';

const ListBodyItem = ({allRecords, clazz}) => {
    return (
        <li className={clazz}>{allRecords} </li>
    )
}

export default ListBodyItem;