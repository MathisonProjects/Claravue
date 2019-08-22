import camelCase from 'lodash/camelCase'

const requireModule = require.context('.', false, /\.json$/)
const JsonStore = {}

requireModule.keys().forEach(fileName => {
    const moduleName = camelCase(
        fileName.replace(/(\.\/|\.json)/g, '')
    )
    JsonStore[moduleName] = requireModule(fileName);
})

export default JsonStore