export const is404 = function(response) {
  return err.response && err.response.status && 404 === err.response.status;
};