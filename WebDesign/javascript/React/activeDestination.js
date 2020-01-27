'use strict';

const e = React.createElement;

class activeDestination extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {  
    return e(
      <a id="activeURL" href="{URL}"><img src="../images/QRcode.png"></a>
      <h2 id="activeName">Current Destination: {Name}</h2>
      );
  }
}

const domContainer = document.querySelector('#activeDestination');
ReactDOM.render(e(activeDestination), domContainer);