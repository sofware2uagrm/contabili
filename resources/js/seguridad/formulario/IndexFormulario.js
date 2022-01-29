
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import axios from 'axios';
import { Button, Card, Col, Dropdown, Menu, Row, Tooltip, Tree } from 'antd';
import { DeleteOutlined, EditOutlined, EyeOutlined, MoreOutlined, PlusOutlined } from '@ant-design/icons';

import TextField from '@mui/material/TextField';
import Swal from 'sweetalert2';

import ComponentModal from '../../components/modal';

import 'antd/dist/antd.css';

function FormularioIndex( ) {
    return (
        <>
            <FormularioIndexPrivate />
        </>
    );
};

class FormularioIndexPrivate extends Component {

    constructor( props) {
        super( props );
        this.state = {
            visible_create: false,
            visible_edit: false,
            visible_show: false,
            visible_delete: false,
            loading: false,
            tree_formulario: [],
            array_formulario: [],
            formulario: null,

            idformulario: null,
            descripcion: "",
            nota: "",
            fkidformulariopadre: null,

            errorDescripcion: false,
            errorNota: false,
        };
        this.draggleRef = React.createRef();
    };
    componentDidMount() {
        this.get_data();
    };
    get_data() {
        axios.get( "/api/formulario/index" ) . then ( ( resp ) => {
            console.log(resp)
            if ( resp.data.rpta === 1 ) {
                this.cargarTree(resp.data.arrayFormulario);
            }
            if ( resp.data.rpta === -5 ) {
                Swal.fire( {
                    position: 'top-end',
                    icon: 'warning',
                    title: resp.data.message,
                    showConfirmButton: false,
                    timer: 1500
                } );
            }

        } ) . catch ( ( error ) => {
            console.log(error);
            Swal.fire( {
                position: 'top-end',
                icon: 'error',
                title: 'Hubo problemas con el servidor',
                showConfirmButton: false,
                timer: 1500
            } );
        } );
    };

    menu( element ) {
        return (
            <Menu key={element.idformulario}>
                <Menu.Item key={element.idformulario + 1}
                    onClick={ () => {
                        this.setState( {
                            visible_create: true,
                            fkidformulariopadre: element.idformulario,
                        } );
                    } }
                >
                    <PlusOutlined style={ { marginRight: 2, fontSize: 12, position: 'relative', top: -3, } } /> <span> Nuevo </span>
                </Menu.Item>
                <Menu.Item key={element.idformulario + 2}
                    onClick={ () => {
                        this.setState( {
                            visible_show: true,
                            fkidformulariopadre: element.idformulario,
                            idformulario: element.idformulario,
                            descripcion: element.descripcion,
                            nota: element.nota,
                        } );
                    } }
                >
                    <EyeOutlined style={ { marginRight: 2, fontSize: 12, position: 'relative', top: -3, } } /> <span> Ver </span>
                </Menu.Item>
                <Menu.Item key={element.idformulario + 3}
                    onClick={ () => {
                        this.setState( {
                            visible_edit: true,
                            fkidformulariopadre: element.idformulario,
                            idformulario: element.idformulario,
                            descripcion: element.descripcion,
                            nota: element.nota,
                        } );
                    } }
                >
                    <EditOutlined style={ { marginRight: 2, fontSize: 12, position: 'relative', top: -3, } } /> <span> Editar </span>
                </Menu.Item>
                {/* <Menu.Item key={element.idformulario + 4}>
                    <DeleteOutlined style={ { marginRight: 2, fontSize: 12, position: 'relative', top: -3, } } /> <span> Eliminar </span>
                </Menu.Item> */}
            </Menu>
        );
    };

    cargarTree( arrayFormulario ) {
        let array = [];
        for (let index = 0; index < arrayFormulario.length; index++) {
            const element = arrayFormulario[index];
            if ( element.fkidformulariopadre === null ) {
                const detalle = {
                    title: 
                        <span style={{ position: 'relative', top: 1, left: 3, paddingRight: 10, paddingBottom: 12, }}>
                            <Tooltip title="Opción">
                                <Dropdown overlay={ this.menu(element) } placement="bottomLeft">
                                    <Button 
                                        icon={<MoreOutlined />} 
                                        size="small" style={{ marginRight: 2, position: 'relative', top: -1, }}
                                    />
                                </Dropdown>
                            </Tooltip>
                            <span> { element.descripcion } </span> 
                        </span>,
                    key: element.idformulario,
                    idformulario: element.idformulario,
                    formulario: element,
                    children: [],
                };
                array.push(detalle);
            }
            this.state.array_formulario = [ ...this.state.array_formulario, element.idformulario ];
        }
        this.treeData( array, arrayFormulario );
        console.log(array)
        this.setState( {
            tree_formulario: array,
            array_formulario: this.state.array_formulario,
        } );
    };
    treeData( array, arrayFormulario ) {
        for (let index = 0; index < array.length; index++) {
            const element = array[index];
            const children = this.childrenData( element.idformulario, arrayFormulario );
            element.children = children;
            this.treeData( children, arrayFormulario );
        }
    };
    childrenData( idpadre, arrayFormulario ) {
        let children = [];
        for (let index = 0; index < arrayFormulario.length; index++) {
            const element = arrayFormulario[index];
            if ( element.fkidformulariopadre === idpadre ) {
                const detalle = {
                    title: 
                        <span style={{ position: 'relative', top: 1, left: 3, paddingLeft: 10, paddingRight: 10, paddingBottom: 12, }}>
                            <Tooltip title="Opción">
                                <Dropdown overlay={ this.menu(element) } placement="bottomLeft">
                                    <Button 
                                        icon={<MoreOutlined />} 
                                        size="small" style={{ marginRight: 2, position: 'relative', top: -1, }}
                                    />
                                </Dropdown>
                            </Tooltip>
                            <span> { element.descripcion } </span> 
                        </span>,
                    key: element.idformulario,
                    idformulario: element.idformulario,
                    formulario: element,
                    children: [],
                };
                children.push(detalle);
            }
        }
        return children;
    };
    onChangeNota(evt) {
        this.setState( {
            nota: evt.target.value,
            errorNota: false,
        } );
    };
    onChangeDescripcion(evt) {
        this.setState( {
            descripcion: evt.target.value,
            errorDescripcion: false,
        } );
    };

    onValidate() { 
        if ( this.state.descripcion.toString().trim().length === 0 ) {
            this.setState( {
                errorDescripcion: true,
            } );
            return;
        }
        this.onStore();
    };
    getDate() {
        let date = new Date();
        let year = date.getFullYear();
        let mounth = date.getMonth() + 1;
        let day = date.getDate();
        return year + "-" + mounth + '-' + day;
    }
    getTime() {
        let date = new Date();
        let hours = date.getHours();
        let minutes = date.getMinutes();
        let seconds = date.getSeconds();
        hours = hours > 9 ? hours : '0' + hours;
        minutes = minutes > 9 ? minutes : '0' + minutes;
        seconds = seconds > 9 ? seconds : '0' + seconds;
        return hours + ':' + minutes + ':' + seconds;
    }
    onStore() {
        let body = {
            nota: this.state.nota,
            descripcion: this.state.descripcion,
            fkidformulariopadre: this.state.fkidformulariopadre,
            x_fecha: this.getDate(),
            x_hora: this.getTime(),
        };
        this.setState( { loading: true, } );
        console.log(body)
        axios.post( "/api/formulario/store", body ) . then ( ( resp ) => {
            console.log(resp)
            if ( resp.data.rpta === 1 ) {
                this.setState( {
                    visible_create: false, nota: "", descripcion: "", 
                    errorNota: false, errorDescripcion: false,
                    fkidformulariopadre: null, loading: false,
                } );
                this.get_data();
                Swal.fire( {
                    position: 'top-end',
                    icon: 'success',
                    title: resp.data.message,
                    showConfirmButton: false,
                    timer: 1500
                } );
                return;
            }
            Swal.fire( {
                position: 'top-end',
                icon: 'warning',
                title: resp.data.message,
                showConfirmButton: false,
                timer: 1500
            } );
        } ) . catch ( ( error ) => {
            console.log(error);
            Swal.fire( {
                position: 'top-end',
                icon: 'error',
                title: 'Hubo problemas con el servidor',
                showConfirmButton: false,
                timer: 1500
            } );
        } ) . finally ( () => {
            this.setState( { loading: false, } );
        } );
    };

    onComponentCreate() {
        return (
            <ComponentModal
                title={"Nuevo Formulario"}
                okButtonProps={{ disabled: this.state.loading, loading: this.state.loading, }}
                cancelButtonProps={{ disabled: this.state.loading, }}
                keyboard={ !this.state.loading }
                maskClosable={ !this.state.loading }
                visible={this.state.visible_create}
                onOk={this.onValidate.bind(this)}
                onClose={ () => {
                    this.setState( { 
                        visible_create: false, nota: "", descripcion: "", 
                        errorNota: false, errorDescripcion: false,
                        fkidformulariopadre: null, idformulario: null,
                    } )
                } }
                cancelText="Cancelar" okText="Guardar" width={350}
            >
                 <Row gutter={[16, 24]}>
                    <Col xs={{ span: 24, }}>
                        <TextField
                            fullWidth
                            label="Descripción" size="small"
                            value={this.state.descripcion}
                            onChange={this.onChangeDescripcion.bind(this)}
                            error={this.state.errorDescripcion}
                            helperText={ this.state.errorDescripcion && "Campo requerido." }
                        />
                    </Col>
                </Row>
                <Row gutter={[16, 24]} style={ { marginTop: 10,} }>
                    <Col xs={{ span: 24, }} sm={ { span: 24, } } >
                        <TextField
                            fullWidth multiline minRows={3}
                            label="Nota" size="small"
                            value={this.state.nota}
                            onChange={this.onChangeNota.bind(this)}
                            error={this.state.errorNota}
                            helperText={ this.state.errorNota && "Campo requerido." }
                        />
                    </Col>
                </Row>
            </ComponentModal>
        );
    }

    onUpdate() {
        if ( this.state.descripcion.toString().trim().length === 0 ) {
            this.setState( {
                errorDescripcion: true,
            } );
            return;
        }
        let body = {
            nota: this.state.nota,
            descripcion: this.state.descripcion,
            fkidformulariopadre: this.state.fkidformulariopadre,
            idformulario: this.state.idformulario,
        };
        this.setState( { loading: true, } );
        console.log(body)
        axios.post( "/api/formulario/update", body ) . then ( ( resp ) => {
            console.log(resp)
            if ( resp.data.rpta === 1 ) {
                this.setState( {
                    visible_edit: false, nota: "", descripcion: "", 
                    errorNota: false, errorDescripcion: false,
                    fkidformulariopadre: null, loading: false, idformulario: null,
                } );
                this.get_data();
                Swal.fire( {
                    position: 'top-end',
                    icon: 'success',
                    title: resp.data.message,
                    showConfirmButton: false,
                    timer: 1500
                } );
                return;
            }
            Swal.fire( {
                position: 'top-end',
                icon: 'warning',
                title: resp.data.message,
                showConfirmButton: false,
                timer: 1500
            } );
        } ) . catch ( ( error ) => {
            console.log(error);
            Swal.fire( {
                position: 'top-end',
                icon: 'error',
                title: 'Hubo problemas con el servidor',
                showConfirmButton: false,
                timer: 1500
            } );
        } ) . finally ( () => {
            this.setState( { loading: false, } );
        } );
    }

    onComponentUpdate() {
        return (
            <ComponentModal
                title={"Editar Formulario"}
                okButtonProps={{ disabled: this.state.loading, loading: this.state.loading, }}
                cancelButtonProps={{ disabled: this.state.loading, }}
                keyboard={ !this.state.loading }
                maskClosable={ !this.state.loading }
                visible={this.state.visible_edit}
                onOk={this.onUpdate.bind(this)}
                onClose={ () => {
                    this.setState( { 
                        visible_edit: false, nota: "", descripcion: "", 
                        errorNota: false, errorDescripcion: false,
                        fkidformulariopadre: null, idformulario: null,
                    } )
                } }
                cancelText="Cancelar" okText="Actualizar" width={350}
            >
                 <Row gutter={[16, 24]}>
                    <Col xs={{ span: 24, }}>
                        <TextField
                            fullWidth
                            label="Descripción" size="small"
                            value={this.state.descripcion}
                            onChange={this.onChangeDescripcion.bind(this)}
                            error={this.state.errorDescripcion}
                            helperText={ this.state.errorDescripcion && "Campo requerido." }
                        />
                    </Col>
                </Row>
                <Row gutter={[16, 24]} style={ { marginTop: 10,} }>
                    <Col xs={{ span: 24, }} sm={ { span: 24, } } >
                        <TextField
                            fullWidth multiline minRows={3}
                            label="Nota" size="small"
                            value={this.state.nota ? this.state.nota : ""}
                            onChange={this.onChangeNota.bind(this)}
                            error={this.state.errorNota}
                            helperText={ this.state.errorNota && "Campo requerido." }
                        />
                    </Col>
                </Row>
            </ComponentModal>
        );
    }

    onComponentShow() {
        return (
            <ComponentModal
                title={"Detalle Formulario"}
                okButtonProps={{ disabled: this.state.loading, loading: this.state.loading, style: { display: 'none', } }}
                cancelButtonProps={{ disabled: this.state.loading, }}
                keyboard={ !this.state.loading }
                maskClosable={ !this.state.loading }
                visible={this.state.visible_show}
                onClose={ () => {
                    this.setState( { 
                        visible_show: false, nota: "", descripcion: "", 
                        errorNota: false, errorDescripcion: false,
                        fkidformulariopadre: null, idformulario: null,
                    } )
                } }
                cancelText="Aceptar" okText={null} width={350}
            >
                 <Row gutter={[16, 24]}>
                    <Col xs={{ span: 24, }}>
                        <TextField
                            fullWidth
                            label="Descripción" size="small"
                            value={this.state.descripcion}
                            InputProps={ {
                                readOnly: true,
                            } }
                        />
                    </Col>
                </Row>
                <Row gutter={[16, 24]} style={ { marginTop: 10,} }>
                    <Col xs={{ span: 24, }} sm={ { span: 24, } } >
                        <TextField
                            fullWidth multiline minRows={3}
                            label="Nota" size="small"
                            value={this.state.nota ? this.state.nota : ""}
                            InputProps={ {
                                readOnly: true,
                            } }
                        />
                    </Col>
                </Row>
            </ComponentModal>
        );
    }

    render() {
        return (
            <>
                { this.onComponentCreate() }
                { this.onComponentUpdate() }
                { this.onComponentShow() }

                <Card title={"FORMULARIO"} bordered
                    extra={ 
                        <Button type="primary" danger
                            onClick={ ( evt ) => {
                                evt.preventDefault();
                                this.setState( {
                                    visible_create: true,
                                } );
                            } }
                        >
                            Nuevo
                        </Button> 
                    }
                    style={{ minWidth: '100%', width: '100%', maxWidth: '100%', }}
                >
                    <Row gutter={[16, 24]}>
                        <Col xs={{ span: 24, }}>
                            <Tree
                                showLine
                                // onSelect={onSelect}
                                // onExpand={onExpand}
                                onExpand={ ( expandedKeys ) => {
                                    this.setState( {
                                        array_formulario: expandedKeys,
                                    } );
                                } }
                                expandedKeys={this.state.array_formulario}
                                treeData={this.state.tree_formulario}
                                style={{ minWidth: '100%', width: '100%', maxWidth: '100%', }}
                            />
                        </Col>
                    </Row>
                </Card>
            </>
        );
    }
};

export default FormularioIndex;

if (document.getElementById('IndexFormulario')) {
    ReactDOM.render(<FormularioIndex />, document.getElementById('IndexFormulario'));
}
