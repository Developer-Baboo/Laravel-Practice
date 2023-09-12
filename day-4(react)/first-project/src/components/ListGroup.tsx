// import ListGroup from "./components/ListGroup";

import { useState } from "react";

// import { Fragment } from "react";
function ListGroup() {
  let items = ["Mithi", "Tharparkar", "Diplo", "Umerkot"];
  const [selectedIndex, setSelectedIndex] = useState(-1);
  //   items = [];
  /* if(items.length == 0){
    return(
        <>
            <h1>List</h1>
            <p>No Element Found</p>
        </>
    );
    
  } */

  return (
    /* <div>
      <h1>List</h1>
      <ul className="list-group">
        <li className="list-group-item">An item</li>
        <li className="list-group-item">A second item</li>
        <li className="list-group-item">A third item</li>
        <li className="list-group-item">A fourth item</li>
        <li className="list-group-item">And a fifth one</li>
      </ul>
    </div> */

    /* <Fragment>
      <h1>List</h1>
      <ul className="list-group">
        <li className="list-group-item">An item</li>
        <li className="list-group-item">A second item</li>
        <li className="list-group-item">A third item</li>
        <li className="list-group-item">A fourth item</li>
        <li className="list-group-item">And a fifth one</li>
      </ul>
    </Fragment>  */

    /* <>
      <h1>List</h1>
      <ul className="list-group">
        <li className="list-group-item">An item</li>
        <li className="list-group-item">A second item</li>
        <li className="list-group-item">A third item</li>
        <li className="list-group-item">A fourth item</li>
        <li className="list-group-item">And a fifth one</li>
      </ul>
    </> */

    <>
      <h1>List</h1>
      {items.length === 0 && <p>No Items Found</p>}
      <ul className="list-group">
        {items.map((item, index) => (
          <li
            className={selectedIndex == index? 'list-group-item active':'list-group-item'}
            key={item}
            onClick={() => {setSelectedIndex(index);}}
          >
            {item}
          </li>
        ))}
      </ul>
    </>
  );
}

export default ListGroup;
