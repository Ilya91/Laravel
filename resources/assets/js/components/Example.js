import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    scopes;
    getScopes() {
        window.axios.defaults.headers.common = {
            'X-Requested-With': 'XMLHttpRequest',
        };
        return axios.get('/api/users')
            .then(response => {
               return response.data;
            });
    }

    render() {
        let users = this.getScopes();
        console.log(users);
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">React Component</div>
                            <div className="card-body">
                                sagfdfgsdfg
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}


if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
