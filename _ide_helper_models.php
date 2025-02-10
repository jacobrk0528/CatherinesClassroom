<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Visitor> $visitors
 * @property-read int|null $visitors_count
 * @method static \Database\Factories\CampaignFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign whereUpdatedAt($value)
 */
	class Campaign extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $cart_total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartItem> $cartItems
 * @property-read int|null $cart_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resource> $resources
 * @property-read int|null $resources_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CartFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCartTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUserId($value)
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $cart_id
 * @property int $resource_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cart $Cart
 * @property-read \App\Models\Resource $Resource
 * @method static \Database\Factories\CartItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereResourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereUpdatedAt($value)
 */
	class CartItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $file_name
 * @property string $file_path
 * @property string $file_type
 * @property string $file_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $name
 * @property-read string $price
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lesson> $lessons
 * @property-read int|null $lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resource> $resources
 * @property-read int|null $resources_count
 * @method static \Database\Factories\FileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereFilePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereFileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereUpdatedAt($value)
 */
	class File extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $lesson_name
 * @property string $lesson_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\File> $files
 * @property-read int|null $files_count
 * @property-read string $name
 * @property-read string $price
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resource> $resources
 * @property-read int|null $resources_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Unit> $units
 * @property-read int|null $units_count
 * @method static \Database\Factories\LessonFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lesson whereLessonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lesson whereLessonPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Lesson whereUpdatedAt($value)
 */
	class Lesson extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $file_id
 * @property int $lesson_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed $0
 * @property mixed $1
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Unit> $files
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lesson> $lessons
 * @property-read int|null $lessons_count
 * @method static \Database\Factories\LessonFileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LessonFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LessonFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LessonFile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LessonFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LessonFile whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LessonFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LessonFile whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LessonFile whereUpdatedAt($value)
 */
	class LessonFile extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Visitor> $visitors
 * @property-read int|null $visitors_count
 * @method static \Database\Factories\MediumFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medium newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medium newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medium query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medium whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medium whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medium whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medium whereUpdatedAt($value)
 */
	class Medium extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $resourceable_type
 * @property int $resourceable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $resourceable
 * @method static \Database\Factories\ResourceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource whereResourceableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource whereResourceableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resource whereUpdatedAt($value)
 */
	class Resource extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Visitor> $visitors
 * @property-read int|null $visitors_count
 * @method static \Database\Factories\SourceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Source newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Source newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Source query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Source whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Source whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Source whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Source whereUpdatedAt($value)
 */
	class Source extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $transaction_status
 * @property string $transaction_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resource> $resources
 * @property-read int|null $resources_count
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\Visitor|null $visitor
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction dateBetween(string $startDate, string $endDate)
 * @method static \Database\Factories\TransactionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction status(array|string $status)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereTransactionAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereTransactionStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereUserId($value)
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $transaction_id
 * @property int $resource_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TransactionItemsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionItems newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionItems newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionItems query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionItems whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionItems whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionItems whereResourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionItems whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionItems whereUpdatedAt($value)
 */
	class TransactionItems extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $unit_name
 * @property string $unit_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int $lesson_count
 * @property-read string $name
 * @property-read string $price
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lesson> $lessons
 * @property-read int|null $lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resource> $resources
 * @property-read int|null $resources_count
 * @method static \Database\Factories\UnitFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereUnitName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereUpdatedAt($value)
 */
	class Unit extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $lesson_id
 * @property int $unit_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed $0
 * @property mixed $1
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lesson> $lessons
 * @property-read int|null $lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Unit> $units
 * @property-read int|null $units_count
 * @method static \Database\Factories\UnitLessonFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UnitLesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UnitLesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UnitLesson query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UnitLesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UnitLesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UnitLesson whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UnitLesson whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UnitLesson whereUpdatedAt($value)
 */
	class UnitLesson extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resource> $resources
 * @property-read int|null $resources_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $resource_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\UserItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereResourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereUserId($value)
 */
	class UserItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $visitor_id
 * @property int $campaign_id
 * @property int $medium_id
 * @property int $source_id
 * @property string $entry_url
 * @property string|null $entry_referrer
 * @property string $user_agent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Campaign|null $campaign
 * @property-read string $referrer
 * @property-read string $url
 * @property-read \App\Models\Medium|null $medium
 * @property-read \App\Models\Source|null $source
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \Database\Factories\VisitorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitor query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitor whereCampaignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitor whereEntryReferrer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitor whereEntryUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitor whereMediumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitor whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitor whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visitor whereVisitorId($value)
 */
	class Visitor extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $visitor_id
 * @property int $transaction_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\VisitorTransactionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VisitorTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VisitorTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VisitorTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VisitorTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VisitorTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VisitorTransaction whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VisitorTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VisitorTransaction whereVisitorId($value)
 */
	class VisitorTransaction extends \Eloquent {}
}

