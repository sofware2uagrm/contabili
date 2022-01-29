
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import axios from 'axios';
import { Button, Card, Col, Row, Table } from 'antd';

import TextField from '@mui/material/TextField';
import Swal from 'sweetalert2';
import 'antd/dist/antd.css';

function UsuarioShow( props ) {
    return (
        <>
            <UsuarioShowPrivate 
            />
        </>
    );
};

class UsuarioShowPrivate extends Component {

    constructor( props) {
        super( props );
        this.state = {
            visible_store: false,
            loading: false,
            disabled: false,

            showPassword: false,

            nombre: "",
            apellido: "",
            email: "",
            login: "",
            password: "",
            imagen: "",
            grupousuario: "",

            arrayGrupoUsuario: [],
        };
        this.columnsGrupoUsuario = [
            {
              title: 'Nro',
              dataIndex: 'nro',
              render: ( text, record, index ) => index + 1,
            },
            {
              title: 'Descripción',
              dataIndex: 'descripcion',
              key: 'descripcion',
            },
        ];
    };
    componentDidMount() {
            this.get_data();
    };
    get_data( ) {
        let idusuario = document.getElementById('idusuario').value;
        axios.get( "/api/usuario/show/" + idusuario ) . then ( ( resp ) => {
            console.log(resp)
            if ( resp.data.rpta === 1 ) {
                this.setState( {
                    nombre: resp.data.usuario.name,
                    apellido: resp.data.usuario.apellido,
                    email: resp.data.usuario.email,
                    login: resp.data.usuario.login,
                    grupousuario: resp.data.usuario.grupousuario ? resp.data.usuario.grupousuario : "",

                    arrayGrupoUsuario: resp.data.arrayGrupoUsuario,
                } );
            }
            if ( resp.data.rpta === -1 ) {
                Swal.fire( {
                    position: 'top-end',
                    icon: 'warning',
                    title: resp.data.message,
                    showConfirmButton: false,
                    timer: 1500
                } );
            }
            if ( resp.data.rpta === -5 ) {
                Swal.fire( {
                    position: 'top-end',
                    icon: 'error',
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
    onBack() {
        this.props.navigate( "/usuario/index" );
    };
    render() {
        return (
            <>
                <Card title={"DETALLE USUARIO"} bordered 
                    extra={ 
                        <Button type="primary" danger
                            href='/usuario/index'
                        >
                            Atras
                        </Button> 
                    }
                    style={{ minWidth: '100%', width: '100%', maxWidth: '100%', }}
                >
                    <Row gutter={[16, 24]}>
                        <Col xs={{ span: 24, }} sm={ { span: 8, } } >
                            <TextField
                                fullWidth
                                label="Nombre" size="small"
                                value={this.state.nombre}
                                InputProps={ {
                                    readOnly: true,
                                } }
                            />
                        </Col>
                        <Col xs={{ span: 24, }} sm={ { span: 16, } } >
                            <TextField
                                fullWidth
                                label="Apellido" size="small"
                                value={this.state.apellido}
                                InputProps={ {
                                    readOnly: true,
                                } }
                            />
                        </Col>
                    </Row>
                    <Row gutter={[16, 24]} style={ { marginTop: 20,} }>
                        <Col xs={{ span: 24, }} sm={ { span: 24, } } >
                            <TextField
                                fullWidth
                                label="Email" size="small"
                                value={this.state.email}
                                InputProps={ {
                                    readOnly: true,
                                } }
                            />
                        </Col>
                    </Row>
                    <Row gutter={[16, 24]} style={ { marginTop: 20,} }>
                        <Col sm={ { span: 4, } } ></Col>
                        <Col xs={{ span: 24, }} sm={ { span: 8, } } >
                            <TextField
                                fullWidth
                                label="Grupo Usuario" size="small"
                                value={this.state.grupousuario}
                                InputProps={ {
                                    readOnly: true,
                                } }
                            />
                        </Col>
                        <Col xs={{ span: 24, }} sm={ { span: 8, } } >
                            <TextField
                                fullWidth
                                label="Usuario" size="small"
                                value={this.state.login}
                                InputProps={ {
                                    readOnly: true,
                                } }
                            />
                        </Col>
                    </Row>

                    {/* <Row gutter={[16, 24]} style={ { marginTop: 20, } }>
                        <Col xs={{ span: 24, }} >
                            <Table columns={this.columnsGrupoUsuario} dataSource={this.state.arrayGrupoUsuario} 
                                bordered style={ { width: '100%', minWidth: '100%', } } pagination={false}
                                size='small' rowKey={"idasignarusuario"}
                                title={() => 'ROL DEL USUARIO'}
                            />
                        </Col>
                    </Row> */}

                </Card>
            </>
        );
    }
};

export default UsuarioShow;

if (document.getElementById('ShowUsuario')) {
    ReactDOM.render(<UsuarioShow />, document.getElementById('ShowUsuario'));
}
