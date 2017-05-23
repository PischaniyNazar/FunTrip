ymaps.ready(init);

                    function init() {
                        var myPlacemark,
                            myMap = new ymaps.Map('map', {
                                center: [49.25, 31.20],
                                zoom: 6
                            }, {
                                searchControlProvider: 'yandex#search'
                            });

                        // Слушаем клик на карте.
                        myMap.events.add('click', function (e) {
                            var coords = e.get('coords');  
                            alert (coords);  
//                            var distance = 2;
// $(document).ready(function(){
//     $.ajax({
//         url: "../admin/index.php",
//         type: "POST",
//         data: "distance="+distance,
//         success: function(responseText){
//             alert(responseText);
//         }
//     });
// });
                            // Если метка уже создана – просто передвигаем ее.
                            if (myPlacemark) {
                                myPlacemark.geometry.setCoordinates(coords);
                            }
                            // Если нет – создаем.
                            else {
                                myPlacemark = createPlacemark(coords);
                                myMap.geoObjects.add(myPlacemark);
                                // Слушаем событие окончания перетаскивания на метке.
                                myPlacemark.events.add('dragend', function () {
                                    getAddress(myPlacemark.geometry.getCoordinates());
                                });
                            }
                            getAddress(coords);
                        });

                        // Создание метки.
                        function createPlacemark(coords) {
                            return new ymaps.Placemark(coords, {}, {
                                preset: 'islands#violetDotIconWithCaption',
                                draggable: true
                            });
                        }

                       
                    }