<?PHP

namespace CryptaEve\Seat\SquadSync\Validation;

use Illuminate\Foundation\Http\FormRequest;

class AddSquadSync extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'squad' => 'required|integer',
            'role' => 'required|integer',
            'permissions' => 'required|array',
            'permissions.*' => 'integer|exists:permissions,id'
        ];
    }
}

