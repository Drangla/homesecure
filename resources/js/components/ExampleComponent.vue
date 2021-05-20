<template xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="columns is-multiline">
            <div class="card column is-half is-offset-one-quarter">
                <header class="card-header">
                    <h1 class="card-header-title">
                        {{ title }}
                    </h1>
                </header>
                <div class="card-content">
                    <div class="content">
                        <button @click="createConnection()"
                                class="button is-danger is-outlined is-small">
                                                <span class="icon">
                                                  <i class="fa fa-remove"></i>
                                                </span>
                        </button>
                        <button @click="doPublish()">moch!</button>
                        <label class="label" for="Personen">Personen</label>

                        <table id="Personen" class="table is-fullwidth is-hoverable">
                            <thead>
                            <tr class="title is-6">

                                <table-element element-type="th">Geburtsdatum</table-element>
                                <table-element element-type="th">SVNR</table-element>
                                <table-element element-type="th">Vorname</table-element>
                                <table-element element-type="th">Nachname</table-element>
                                <table-element element-type="th"></table-element>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="person in personen" :key="person.id">

                                <table-element element-type="td">{{ person.Geburtsdatum | moment('DD.MM.YYYY')  }}</table-element>
                                <table-element element-type="td">{{ person.SVNR }}</table-element>
                                <table-element element-type="td">{{ person.Vorname }}</table-element>
                                <table-element element-type="td">{{ person.Nachname }}</table-element>
<!--                                <table-element element-type="td">-->
<!--                                    <p class="buttons" v-if="user.id === blog.user.id">-->
<!--                                        <a :href="'/blog/' + blog.slug + '/edit'" class="button is-info is-outlined is-small">-->
<!--                            <span class="icon">-->
<!--                              <i class="fa fa-edit"></i>-->
<!--                            </span>-->
<!--                                        </a>-->
<!--                                        <button v-if="!blog.messages.length" @click="openDeleteModal(blog)"-->
<!--                                                class="button is-danger is-outlined is-small">-->
<!--                            <span class="icon">-->
<!--                              <i class="fa fa-remove"></i>-->
<!--                            </span>-->
<!--                                        </button>-->
<!--                                    </p>-->
<!--                                </table-element>-->
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script>
    import TableElement from "./base/TableElementComponent";
    import mqtt from 'mqtt';

    export default {
        name: "ExampleComponent",
        components: {
            TableElement,

        },
        props: ['title'],
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                personen: [],
                loading: true,
                form: {
                    category_id: 1,
                },
                keinePersonen: false,

              connection: {
                host: 'homesecure.dommax.net',
                port: 1885,
                endpoint: '',
                clean: true, // Reserved session
                connectTimeout: 4000, // Time out
                reconnectPeriod: 4000, // Reconnection interval
                // Certification Information
                clientId: 'mqttjs_3be2c321',
                //username: 'emqx_test',
                //password: 'emqx_test',
              },
              subscription: {
                topic: 'homesecure',
                qos: 0,
              },
              publish: {
                topic: 'homesecure',
                qos: 0,
                payload: '{ "msg": "Hello, I am browser." }',
              },
              receiveNews: '',
              qosList: [
                { label: 0, value: 0 },
                { label: 1, value: 1 },
                { label: 2, value: 2 },
              ],
              client: {
                connected: false,
              },
              subscribeSuccess: false,
            }
        },
        methods: {
            getList() {
                console.log('calling GET');
                axios.get('/list/person')
                    .then(response => {
                        this.personen = response.data;
                        console.log(response);
                        this.loading = false;
                        if (this.loading)
                            this.keinePersonen = true;
                    });

            },
          // Create connection
          createConnection() {

            const { host, port, endpoint, ...options } = this.connection
            const connectUrl = `ws://${host}:${port}${endpoint}`
            try {
              this.client = mqtt.connect(connectUrl, options)
            } catch (error) {
              console.log('mqtt.connect error', error)
            }
            this.client.on('connect', () => {
              console.log('Connection succeeded!')
            })
            this.client.on('error', error => {
              console.log('Connection failed', error)
            })
            this.client.on('message', (topic, message) => {
              this.receiveNews = this.receiveNews.concat(message)
              console.log(`Received message ${message} from topic ${topic}`)
            })
          },
          doPublish() {
            //const { topic, qos, payload } = this.publication;
            this.client.publish('homesecure','sers vom Webserver!', 0, error => {
              if (error) {
                console.log('Publish error', error)
              }
            })
          }
        }
    }
</script>
