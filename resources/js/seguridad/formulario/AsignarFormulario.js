
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import axios from 'axios';
import { Button, Card, Checkbox, Col, Row, Table, Tooltip, Transfer, Tree } from 'antd';

import { MenuItem, TextField } from '@mui/material';
import Swal from 'sweetalert2';

import ComponentModal from '../../components/modal';
import 'antd/dist/antd.css';

function AsignarFormulario( ) {
    return (
        <>
            <AsignarFormularioPrivate 
            />
        </>
    );
};

class AsignarFormularioPrivate extends Component {

    constructor( props) {
        super( props );
        this.state = {
            visible_store: false,
            visible_grupousuario: false,

            loading: false,
            disabled: true,

            fkidgrupousuario: "",
            grupousuario: "",
            array_grupousuario: [],
            tree_formulario: [],
            array_keyformulario: [],
            array_formulario: [],
        };
        this.columns_grupousuario = [ 
            {
                title: 'Còdigo',
                dataIndex: 'idgrupousuario',
                key: 'idgrupousuario',
            },
            {
                title: 'Descripón',
                dataIndex: 'descripcion',
                key: 'descripcion',
            },
        ];
    };
    componentDidMount() {
        this.get_data();
    };
    get_data() {};
    get_formulario(grupousuario, evt) {
        this.setState( { loading: true, } );
        axios.get( "/api/grupousuario/getformulario/" + grupousuario.idgrupousuario ) . then ( ( resp ) => {
            console.log(resp)
            if ( resp.data.rpta === 1 ) {
                this.cargarTree(resp.data.arrayFormularioConGrupoUsuario);
                setTimeout(() => {
                    this.setState( { 
                        visible_grupousuario: false, 
                        grupousuario: grupousuario.descripcion,
                        fkidgrupousuario: grupousuario.idgrupousuario,
                    } );
                }, 500);
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
        } ) . finally ( () => {
            this.setState( { loading: false, } );
        } );
    };
    cargarTree( arrayFormulario ) {
        console.log(arrayFormulario)
        let array = [];
        this.state.array_keyformulario = [];
        this.state.array_formulario = [];
        for (let index = 0; index < arrayFormulario.length; index++) {
            const element = arrayFormulario[index];
            if ( element.fkidformulariopadre === null ) {
                element.index = index;
                const detalle = {
                    title: 
                        <span style={{ position: 'relative', top: 1, left: 3, paddingRight: 10, paddingBottom: 12, }}>
                            <Tooltip title="Visible">
                                <Checkbox 
                                    onClick={ () => {
                                        if ( element.visible === "A" ) this.state.array_formulario[element.index].visible = "N";
                                        else this.state.array_formulario[element.index].visible = "A";
                                        this.setState( {
                                            loading: true,
                                            array_formulario: this.state.array_formulario,
                                        } );
                                        setTimeout(() => {
                                            this.cargarTree( this.state.array_formulario );
                                        }, 500);
                                        console.log( element )
                                    } } 
                                    checked={ element.visible === "A" ? true : false } 
                                />
                            </Tooltip>                            
                            <span> { element.descripcion } </span> 
                        </span>,
                    key: element.idformulario,
                    idformulario: element.idformulario,
                    formulario: element,
                    children: [],
                    visible: element.visible,
                };
                array.push(detalle);
            }
            this.state.array_keyformulario.push(element.idformulario);
            this.state.array_formulario.push(element);
        }
        this.treeData( array, arrayFormulario );
        console.log(array)
        this.setState( {
            tree_formulario: array,
            array_keyformulario: this.state.array_keyformulario,
            array_formulario: this.state.array_formulario,
            disabled: false,
            loading: false,
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
                element.index = index;
                const detalle = {
                    title: 
                        <span style={{ position: 'relative', top: 1, left: 3, paddingLeft: 10, paddingRight: 10, paddingBottom: 12, }}>
                            <Tooltip title="Visible">
                                <Checkbox 
                                    onClick={ () => {
                                        if ( element.visible === "A" ) this.state.array_formulario[element.index].visible = "N";
                                        else this.state.array_formulario[element.index].visible = "A";
                                        this.setState( {
                                            loading: true,
                                            array_formulario: this.state.array_formulario,
                                        } );
                                        setTimeout(() => {
                                            this.cargarTree( this.state.array_formulario );
                                        }, 500);
                                        console.log( element )
                                    } } 
                                    checked={ element.visible === "A" ? true : false } 
                                />
                            </Tooltip>
                            <span> { element.descripcion } </span> 
                        </span>,
                    key: element.idformulario,
                    idformulario: element.idformulario,
                    formulario: element,
                    children: [],
                    visible: element.visible,
                };
                children.push(detalle);
            }
        }
        return children;
    };
    get_grupousuario() {
        axios.get( "/api/grupousuario/index" ) . then ( ( resp ) => {
            console.log(resp)
            if ( resp.data.rpta === 1 ) {
                this.setState( {
                    array_grupousuario: resp.data.arrayGrupoUsuario,
                    visible_grupousuario: true,
                } );
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
    onVisibleGrupoUsuario() {
        this.get_grupousuario();
    }

    onValidate() {
        if ( this.state.descripcion.toString().trim().length === 0 ) {
            this.setState( { errordescripcion: true, } );
            return;
        }
        this.onStore();
    }
    onAsignar() {
        let body = {
            arrayFormulario: JSON.stringify(this.state.array_formulario),
        };
        this.setState( { loading: true, } );
        axios.post( "/api/grupousuario/asignarformulario", body ) . then ( ( resp ) => {
            console.log(resp)
            this.setState( { disabled: false, } );
            if ( resp.data.rpta === 1 ) {
                Swal.fire( {
                    position: 'top-end',
                    icon: 'success',
                    title: resp.data.message,
                    showConfirmButton: false,
                    timer: 1500
                } );
                this.setState( { 
                    disabled: true,
                    fkidgrupousuario: "",
                    grupousuario: "",
                    array_grupousuario: [],
                    tree_formulario: [],
                    array_keyformulario: [],
                    array_formulario: [],
                } );
                return;
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
            this.setState( { disabled: false, } );
        } ) . finally ( () => {
            this.setState( { loading: false, } );
        } );
    }
    onComponentGrupoUsuario() {
        return (
            <ComponentModal
                visible={this.state.visible_grupousuario}
                title={"GRUPO USUARIO"}
                onClose={ () => {
                    this.setState( { 
                        visible_grupousuario: false, 
                        fkidgrupousuario: "", grupousuario: "", 
                    } );
                } }
            >
                <Row gutter={[16, 24]}>
                    <Col xs={{ span: 24, }}>
                        <Table columns={this.columns_grupousuario} dataSource={this.state.array_grupousuario} 
                            bordered style={ { width: '100%', minWidth: '100%', padding: 15, paddingTop: 10, paddingBottom: 10, } } 
                            pagination={false} size='small' rowKey={"idgrupousuario"}
                            onRow={(record, rowIndex) => {
                                return {
                                    onClick: this.get_formulario.bind(this, record), // click row
                                    onDoubleClick: event => {}, // double click row
                                    onContextMenu: event => {}, // right button click row
                                    onMouseEnter: event => {}, // mouse enter row
                                    onMouseLeave: event => {}, // mouse leave row
                                };
                            }}
                        />
                    </Col>
                </Row>
            </ComponentModal>
        );
    };
    onLoading() {
        return (
            <ComponentModal
                visible={this.state.loading} zIndex={999999}
                keyboard={false} maskClosable={false} closable={false}
                width={100} title={null}
                footer={null}
            >
                <Row gutter={[16, 24]} justify='center'>
                    Procesando...
                </Row>
            </ComponentModal>
        );
    }
    onLimpiar() {
        this.setState( { 
            disabled: true,
            fkidgrupousuario: "",
            grupousuario: "",
            array_grupousuario: [],
            tree_formulario: [],
            array_keyformulario: [],
            array_formulario: [],
        } );
    }
    render() {
        return (
            <>
                { this.onComponentGrupoUsuario() }
                { this.onLoading() }
                <Card title={"ASIGNAR FORMULARIO"} bordered
                    style={{ minWidth: '100%', width: '100%', maxWidth: '100%', }}
                >
                    <Row gutter={[16, 24]}>
                        <Col sm={{ span: 8, }}></Col>
                        <Col xs={{ span: 24, }} sm={ { span: 8, } } >
                            <TextField
                                fullWidth
                                label="Grupo Usuario" size="small"
                                value={this.state.fkidgrupousuario}
                                select={true}
                                InputProps={ {
                                    readOnly: true,
                                } }
                                onClick={this.onVisibleGrupoUsuario.bind(this)}
                                disabled={this.state.disabled}
                            >
                                <MenuItem value={this.state.fkidgrupousuario}>
                                    { this.state.grupousuario }
                                </MenuItem>
                            </TextField>
                        </Col>
                    </Row>
                    <Row gutter={[16, 24]} style={ { marginTop: 20,} }>
                        <Col xs={ { span: 24, } }>
                            <Tree
                                showLine
                                // onSelect={onSelect}
                                onExpand={ ( expandedKeys ) => {
                                    this.setState( {
                                        array_keyformulario: expandedKeys,
                                    } );
                                } }
                                expandedKeys={this.state.array_keyformulario}
                                treeData={this.state.tree_formulario}
                                style={{ minWidth: '100%', width: '100%', maxWidth: '100%', border: '1px solid #E8E8E8' }}
                            />
                        </Col>
                    </Row>
                    <Row gutter={[16, 24]} style={ { marginTop: 20,} } justify='center'>
                        <Button danger style={ { marginRight: 5, } }
                            onClick={this.onLimpiar.bind(this)} disabled={this.state.disabled}
                        >
                            Limpiar
                        </Button>
                        <Button type="primary" danger disabled={this.state.disabled}
                            onClick={this.onAsignar.bind(this)}
                        >
                            Asignar
                        </Button>
                    </Row>
                </Card>
            </>
        );
    }
};

export default AsignarFormulario;

if (document.getElementById('AsignarFormulario')) {
    ReactDOM.render(<AsignarFormulario />, document.getElementById('AsignarFormulario'));
}
