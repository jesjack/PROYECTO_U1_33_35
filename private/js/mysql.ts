/**
 * Ejecuta una instrucción sql en la base de datos
 * @param sql Es la instrucción sql
 * @param callback Retorna los mismos resultados que el modulo de mysql original
 */
const MySQL =
  function MySQL(
    sql: string,
    callback: (error: Error, results: any, fields: any) => void
  ): void {}

/**
 * Ejecuta un archivo .sql en la base de datos
 * @param path Es la ruta del archivo
 * @param callback Retorna los mismos resultados que el modulo de mysql original
 */
MySQL.file = function file(
  path: string,
  callback: (error: Error, results: any, fields: any) => void
): void {}

/**
 * Crea la Base de datos proyecto_33_35
 * @param callback Retorna los mismos resultados que el modulo de mysql original
 */
MySQL.init = function init(callback: (error: Error, results: any, fields: any) => void): void {}

export = MySQL