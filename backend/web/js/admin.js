document.addEventListener('DOMContentLoaded', () => {
    if ( document.querySelector('.status-items') ) {
        document.querySelector('.status-items').addEventListener('click', (e) => {
            let items = e.target.closest('.status-item');
            if (items) {
                let btn = e.target.closest('.status-btn a');
                if (btn) {
                    let status = btn.dataset.status;
                    let id = items.dataset.id;
                    let data = { 'id':id, 'status':status };
                    if (items.dataset.status != status) {
                        statusAjax(data)
                            .then(response => {
                                items.dataset.status = status;
                            })
                            .catch(error => console.error('error'));
                    }
                }
            }
        });

        document.querySelector('.floor-items').addEventListener('click', (e) => {
            let floors = e.target.closest('.floor-item');
            if (floors) {
                let floor = floors.dataset.floor;
                
                if (document.querySelector('.floor-items').dataset.current != floor) {
                    let data = { 'floor':floor };
                    statusAjax(data)
                        .then(response => {
                            document.querySelector('.status-items').innerHTML = response;
                            document.querySelector('.floor-items').dataset.current = floor;
                            document.querySelector('.floor-item.active').classList.remove('active');
                            document.querySelector(`.floor-item[data-floor="${floor}"]`).classList.add('active');
                        })
                        .catch(error => {
                            console.error('error');
                        });
                }
            }
        });

        function statusAjax(data) {
            return new Promise((succeed, fail) => {
                // console.log(wrap.dataset.id);
                let quizRequest = new XMLHttpRequest();
                quizRequest.open("POST", '/admin/flat/status', true);
                quizRequest.setRequestHeader('Content-Type', 'application/json');
                // quizRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
                quizRequest.setRequestHeader('X-CSRF-Token', yii.getCsrfToken());
                quizRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                quizRequest.onload = function() {
                    if(quizRequest.readyState == XMLHttpRequest.DONE && quizRequest.status == 200) {
                        // rend(JSON.parse(quizRequest.responseText));
                        succeed(quizRequest.responseText);
        
                    } else if (quizRequest.status == 400) {
                        fail(new Error(`Request failed: ${quizRequest.status}`));
                    } else {
                        fail(new Error(`Request failed: ${quizRequest.status}`));
                    }
                }
                quizRequest.onerror = function() {console.log(onerror)};
                // let data = { survey_id: quiz.dataset.id };
                
        
                // quizRequest.send('survey_id=2&parent_id=0');
                quizRequest.send(JSON.stringify(data));
                // quizRequest.send(encodeURI(data));
                // quizRequest.send(data);
                // quizRequest.send();
            })
            
        }
    }
});

window.addEventListener('load', () => {
    if ( document.querySelector('.statistic') ) {
        // console.log(users, usersLabels);
        let data = {
            // A labels array that can contain any sort of values
            labels: usersLabels,
            // Our series array that contains series objects or in this case series data arrays
            series: [
                users,
                newUsers
            ]
        };

        let data2 = {
            low: 0,
            showArea: true,
            showPoint: false,
            axisY: {
                onlyInteger: true
            }
        };

        let pageBy = {
            // A labels array that can contain any sort of values
            labels: usersLabels,
            // Our series array that contains series objects or in this case series data arrays
            series: [
                pageByDay
            ]
        };

        let page = {
            // A labels array that can contain any sort of values
            labels: pagesLabels,
            // Our series array that contains series objects or in this case series data arrays
            series: [
                pages
            ]
        };

        // Create a new line chart object where as first parameter we pass in a selector
        // that is resolving to our chart container element. The Second parameter
        // is the actual data object.
        let grf = new Chartist.Line('.chart', data, data2);
        let pgBD = new Chartist.Line('.page-by-day', pageBy, data2);
        let pg = new Chartist.Line('.page', page, data2);
    }
    
})