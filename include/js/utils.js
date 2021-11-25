/**
 * 숫자에 세 자리 수 마다 콤마 추가
 *
 * @param num
 * @returns {string}
 */
function addComma(num) {
	let regexp = /\B(?=(\d{3})+(?!\d))/g;
	return num.toString().replace(regexp, ',');
}

/**
 * 날짜 객체를 'YYYY-MM-DD' 문자열로 변환
 *
 * @param targetDate
 * @returns {string}
 */
function getDateStr(targetDate) {

	let month = (targetDate.getMonth() + 1);
	let day = targetDate.getDate();

	if (month < 10)
		month = '0' + month;
	if (day < 10)
		day = '0' + day;

	return targetDate.getFullYear() + '-' + month + '-' + day;

}
