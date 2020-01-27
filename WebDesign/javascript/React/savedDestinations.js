'use strict';

const e = React.createElement;

class savedDestinations extends React.Component {
  constructor(props) {
    super(props);
    // this.state = { 
    //   name: props.name,
    //   url: props.url, 
    // };
  }

  render() {
    //open file
    while(not eof) {
      //read data
      //create savedDestination
      //add to table
    }
    
    return (
      <div id="savedDestinations">
        <h2>Saved Destinations</h2>
        <table>
          {savedDestinations}
        </table>
      </div>
      );
  }
}

class savedDestination extends React.Component {
  constructor(props) {
    super(props);
    this.state = { 
      name: props.name,
      url: props.url, 
    };
  }
}