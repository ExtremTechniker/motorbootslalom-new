import React, { Component } from 'react';
import {Field} from "formik";

export interface BojeProps {
    state: -1 | 0 | 1
    id: string
}

export default class Boje extends Component<BojeProps> {

    render() {
        if (this.props.state === -1) {
            return <div className="boje_grau"></div>
        } else if (this.props.state === 0) {
            return (
                <div className="boje_irrelevant">
                    <Field type={"checkbox"} name={"buoys"} value={this.props.id} id={this.props.id}/>
                    <label htmlFor={this.props.id}></label>
                </div>)
        } else if (this.props.state === 1) {
            return (<>
                <Field type={"checkbox"} name={"buoys"} value={this.props.id} id={this.props.id}/>
                <label htmlFor={this.props.id}></label>
            </>)
        }
    }
}