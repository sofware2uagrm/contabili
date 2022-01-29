
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import axios from 'axios';
import { Button, Card, Col, Row, Table, Tooltip } from 'antd';
import { EditOutlined, EyeOutlined } from '@ant-design/icons';

import Swal from 'sweetalert2';
import 'antd/dist/antd.css';

function UsuarioIndex( props ) {
    return (
        <>
            <UsuarioIndexPrivate 
            />
        </>
    );
};

class UsuarioIndexPrivate extends Component {

    constructor( props) {
        super( props );
        this.state = {
            visible_delete: false,
            loading: false,

            array_usuario: [],
            search: "",
            paginate: 10,
            page: 1,
            idusuario: null,
        };
        this.columns = [ 
            {
                title: 'Nro',
                dataIndex: 'nro',
                key: 'nro',
                render: ( text, record ) => {
                    let style = {};
                    return <span style={ style }> { record.nro } </span>
                },
            },
            {
                title: 'Nombre',
                dataIndex: 'nombre',
                key: 'nombre',
                render: ( text, record ) => {
                    return <span> { record.nombre } </span>
                },
            },
            {
                title: 'Usuario',
                dataIndex: 'login',
                key: 'login',
            },
            {
                title: 'Email',
                dataIndex: 'email',
                key: 'email',
            },
            {
                title: 'Acción',
                dataIndex: 'accion',
                render: (text, record) => {
                    return (
                        <>
                                <Tooltip title="editar">
                                    <Button shape="circle" style={ { marginRight: 5, } }
                                        icon={<EditOutlined style={ { position: 'relative', top: -2, } } />} 
                                        href={ '/usuario/edit/' + record.usuario.id }
                                    />
                                </Tooltip>
                                <Tooltip title="ver">
                                    <Button shape="circle" style={ { marginRight: 5, } }
                                        icon={<EyeOutlined style={ { position: 'relative', top: -2, } } />} 
                                        href={ '/usuario/show/' + record.usuario.id }
                                    />
                                </Tooltip>
                        </>
                    )
                },
            }
        ];
    };
    componentDidMount() {
        this.get_data();
    };
    get_data( search = "", paginate = 10, page = 1 ) {
        axios.get( "/api/usuario/index?page=" + page + "&search=" + search + "&paginate=" + paginate ) . then ( ( resp ) => {
            console.log(resp)
            if ( resp.data.rpta === 1 ) {
                let array = [];
                for (let index = 0; index < resp.data.arrayUsuario.length; index++) {
                    const element = resp.data.arrayUsuario[index];
                    let apellido = element.apellido ? element.apellido : "";
                    let detalle = {
                        nro: index + 1,
                        nombre: element.name + " " + apellido,
                        login: element.login,
                        email: element.email,
                        usuario: element,
                    };
                    array.push(detalle);
                }
                this.setState( {
                    array_usuario: array,
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

    render() {
        return (
            <>
                <Card title={"USUARIO"} bordered 
                    extra={ 
                        <Button type="primary" danger
                            href='/usuario/create'
                        >
                            Nuevo
                        </Button> 
                    }
                    style={{ minWidth: '100%', width: '100%', maxWidth: '100%', }}
                >
                    <Row gutter={[16, 24]}>
                        <Col xs={{ span: 24, }}>
                            <Table columns={this.columns} dataSource={this.state.array_usuario} 
                                bordered style={ { width: '100%', minWidth: '100%', } } pagination={false}
                                size='small' rowKey={"nro"}
                            />
                        </Col>
                    </Row>
                </Card>
            </>
        );
    }
};

export default UsuarioIndex;

if (document.getElementById('IndexUsuario')) {
    ReactDOM.render(<UsuarioIndex />, document.getElementById('IndexUsuario'));
}
