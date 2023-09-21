import {ref} from 'vue'

const mentionSearchResults = ref([])

export default () => {


    const mentionSearch = async (username) => {
        return await axios.get(route('user_mention', {
            'search': username
        })).then(({data}) => {
            console.log(data);
            const usernames = Object.keys(data.body),
                result = [];

            usernames.forEach(usernameResult => result.push({
                label: `${data.body[usernameResult]} (@${usernameResult})`,
                value: usernameResult
            }))

            mentionSearchResults.value = result;
        })
    }

    return {
        mentionSearch,
        mentionSearchResults
    }
}
