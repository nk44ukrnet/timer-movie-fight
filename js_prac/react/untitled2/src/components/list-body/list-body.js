import React from 'react';
import ListBodyItem from "../list-body-item/list-body-item";

const ListBody = ({allRecords}) => {
    const result = allRecords.map(elem=> {
        const like = elem.like;
        const important = elem.important;
        let clazz = '';
        if(like && important) {
            clazz = 'alert';
        }
        return (
            <ListBodyItem key={elem.id} allRecords={elem.text} clazz={clazz} />
        )
    })
    return (
        <ul>
            {result}
        </ul>
    )
}

export default ListBody;