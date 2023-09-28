import Map from 'ol/Map.js';
import View from 'ol/View.js';
import TileLayer from 'ol/layer/Tile.js';
import Feature from 'ol/Feature';
import VectorSource from 'ol/source/Vector';
import VectorLayer from 'ol/layer/Vector';
import OSM from 'ol/source/OSM.js';
import Point from 'ol/geom/Point';
import { Style, Fill, Stroke, Circle, Text } from 'ol/style.js';

document.addEventListener('alpine:init', () => {
    Alpine.data('map', function () {
        return {
            map: {},
// a vector source is composed of features, which are basically objects with a geometry (point in
// our case) and attributes (name in this example), we initialize our component variable to an
// array of 3 features:
            features: [
                new Feature({
                    geometry: new Point([21.126998662948612, 55.71844520512583]),
                    name: 'Kebabai',
                }),
                new Feature({
                    geometry: new Point([21.39720439910889, 55.70928275313513]),
                    name: 'Pas Ibo',
                }),
            ],
            init() {			
                this.map = new Map({
                    target: this.$refs.map,
                    layers: [
                        new TileLayer({
                            source: new OSM(),
                        }),
// we add an extra vector layer to the map with the source using our local component features
// variable
                        new VectorLayer({
                            source: new VectorSource({
                                features: this.features,
                            }),
// we call a function for the style, this function will receive each individual feature	
                            style: this.styleFunction,
                        })
                    ],
                    view: new View({
                        projection: 'EPSG:4326',
                        center: [0, 0],
                        zoom: 2,
                    }),
                })
            },
// The styleFunction defines how each feature will look on the map, it receives 
// each individual feature, we will use this later to conditionaly style them. 
// The styleFunction also defines labels for our features, based on their name 
// attributes in our example. The style will represent a circle with a 4px radius 
// with fill and stroke colors, for the label, we get a little fancy and make it 
// offset with a transparent background, this example is a first demonstration 
// on how to symbolize a layer of points.
            styleFunction(feature) {
                return new Style({
                    image: new Circle({
                        radius: 7,
                        fill: new Fill({
                            color: 'rgba(0, 255, 255, 0.5)',
                        }),
                        stroke: new Stroke({
                            color: 'rgba(192, 192, 192, 1)',
                            width: 2
                        }),
                    }),
                    text: new Text({
                        font: '12px sans-serif',
                        textAlign: 'left',
                        text: feature.get('name'),
                        offsetY: -15,
                        offsetX: 5,
                        backgroundFill: new Fill({
                            color: 'rgba(255, 255, 255, 0.5)',
                        }),
                        backgroundStroke: new Stroke({
                            color: 'rgba(227, 227, 227, 1)',
                        }),
                        padding: [5, 2, 2, 5]
                    })
                })
            }
        };
    });
});